"use client";

import { createContext, useEffect, useState, useRef, useContext} from "react";
import { SocketContext } from "./SocketContext";
import Peer from "simple-peer";
import { useParams } from "react-router-dom";

export const VideoCallContext = createContext();

export const VideoCallContextProvider = ({children}) => {
    
    const [stream, setStream] = useState(null);
    const [peers, setPeers] = useState([]);
    const [selectedVideoInput, setSelectedVideoInput] = useState(null);
    const {socket} = useContext(SocketContext);
    const peersRef = useRef();
    const connectionRef = useRef();
    const [videoInputs, setVideoInputs] = useState([]);

    const userVideo = useRef();
    const params = useParams();
    const roomID = params.id;
    const user = JSON.parse(localStorage.getItem("h-user")).id;
    

    useEffect(() => {

        if(socket === null) return; 
          let videoDevice = [];
          getDevices().then( (devices) =>{

            devices.map((device) => {
              if(device.kind == "videoinput"){
                videoDevice.push(device);
              }
            });
                  // console.log("videoDevice input",videoDevice);
                  setVideoInputs(videoDevice);
                startStream(videoDevice[0].deviceId);
          })

    }, [socket]);

    useEffect(() => {
      if(selectedVideoInput !== null){ 
        startStream(selectedVideoInput);
      }
    }, [selectedVideoInput]);
  
    async function getDevices() {

      return new Promise((resolve, reject) => {
        navigator.mediaDevices
        .enumerateDevices()
        .then((devices) => {resolve(devices)})
    });

    }
    
    let prevTrack;
    function startStream (deviceId) {
        if (stream) {
          stream.getTracks().forEach((track) => {
            if (track.kind === "video") {
              prevTrack = track;
              track.stop();
            }
          });
        }
    
        let constraints = {
          audio: true,
          video: {
            deviceId: deviceId
          },
        };
        navigator.mediaDevices
          .getUserMedia(constraints)
          .then( str => {     
            let status = 0; 
            if (peersRef.current) {
              status = 1;
              stream.removeTrack(stream.getVideoTracks()[0]);
              stream.addTrack(str.getVideoTracks()[0]);
              peersRef.current.replaceTrack(
                prevTrack,
                str.getVideoTracks()[0],
                stream
              );
              userVideo.current.muted = false;
            } else {
              setStream(str);
              userVideo.current.muted = true;
            }
            userVideo.current.srcObject  = str;
            if(status == 1 ){
              return;
            }
            const userId = user;
            socket.emit("join room", {roomID, userId});
            socket.on("all users", users => {
                const peers = [];
                users.forEach(user => {
                    const peer = createPeer(user.socketId, socket.id, str);
                    peersRef.current = peer;
                    peers.push(peer);
                })
                setPeers(peers);
            })

            socket.on("user joined", payload => {
                const peer = addPeer(payload.signal, payload.callerID, str);
                peersRef.current = peer;

                setPeers(users => [...users, peer]);
            });

            socket.on("receiving returned signal", payload => {
                const item = peersRef.current;
                item.signal(payload.signal);
            });

          })
          .then()
          .catch();
      };


      function changeVideoCamera(e) {
        setSelectedVideoInput(e.target.value);
      };

    function createPeer(userToSignal, callerID, stream) {
        const peer = new Peer({
            initiator: true,
            trickle: false,
            stream,
        });

        peer.on("signal", signal => {
            socket.emit("sending signal", { userToSignal, callerID, signal })
        })

        return peer;
    }

    function addPeer(incomingSignal, callerID, stream) {
        const peer = new Peer({
            initiator: false,
            trickle: false,
            stream,
        })

        peer.on("signal", signal => {
            socket.emit("returning signal", { signal, callerID })
        })

        peer.signal(incomingSignal);

        return peer;
    }

    const callUser = (id) => {
      setOpenCallDialog(true);
      myAudioRef.current.muted = false;
      const peer = new Peer({ initiator: true, trickle: false, stream });
      peer.on("signal", (data) => {
        socket.emit("callRequest", {
          otherParty: {
            clientId: id,
          },
          from: `${me.fname} ${me.lname}`,
          signalData: data,
        });
      });
  
      peer.on("stream", (currentStream) => {
        userVideo.current.srcObject = currentStream;
        userVideo.current.muted = false;
      });
      socket.on("callAccepted", (signal) => {
        myAudioRef.current.muted = true;
        setCallAccepted(true);
        setOpenCallDialog(false);
        setCallEnded(false);
        setShowUsersList(false);
        peer.signal(signal);
      });
  
      connectionRef.current = peer;
    };

    return <VideoCallContext.Provider value={{userVideo, changeVideoCamera, selectedVideoInput, videoInputs, peers}}>{children}</VideoCallContext.Provider>
}