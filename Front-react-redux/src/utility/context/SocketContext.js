"use client";

import { createContext, useEffect, useState } from "react";
import {io} from "socket.io-client";
import config from "../../configs/app";

export const SocketContext = createContext();


export const SocketContextProvider = ({children}) => {

    const [socket, setSocket] = useState(null);

    useEffect(() => { 
        const newSocket = io(config.socket.url);
        setSocket(newSocket);
        
        return () => {
            newSocket.disconnect();
        }
     },[]);
 
    return <SocketContext.Provider value={{socket}}>{children}</SocketContext.Provider>
}