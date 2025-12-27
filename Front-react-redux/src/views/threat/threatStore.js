import "@styles/react/pages/page-authentication.scss";
import ThreatStoreComponent from "../../components/threat/ThreatStoreComponent";
import { useEffect } from "react";
import { useDispatch } from "react-redux";
import { featchSelectThreats } from "../../redux/threat/selectThreat";

const ThreatStore = () => {
  const distpatch = useDispatch();
  useEffect( () => {

    distpatch(featchSelectThreats());
}, [])

  return (
    <><ThreatStoreComponent /></>
  );
};

export default ThreatStore;