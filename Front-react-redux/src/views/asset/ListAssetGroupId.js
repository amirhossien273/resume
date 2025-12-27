import "@styles/react/pages/page-authentication.scss";
import AssetList from "../../components/asset/AssetListComponent";
import { useParams } from "react-router-dom";
import { useDispatch, useSelector } from "react-redux";
import { useEffect } from "react";
import { featchAssetsGropID } from "../../redux/asset/asset";

const OrganStore = () => {
    const params = useParams();
    const distpatch = useDispatch();
    const { assetGroupID } = useSelector( (s) => s);
    
    useEffect( () => {

        distpatch(featchAssetsGropID(params.groupID));
    }, [])
  return (
    <><AssetList assets={assetGroupID.data}/></>
  );
};

export default OrganStore;