import "@styles/react/pages/page-authentication.scss";
import AssetStoreComponent from "../../components/asset/AssetStoreComponent";
import { useDispatch } from "react-redux";
import { featchSelectAssets } from "../../redux/asset/selectAsset";
import { useEffect } from "react";

const OrganStore = () => {

  const distpatch = useDispatch();
  
  useEffect( () => {

      distpatch(featchSelectAssets());
  }, [])

  return (
    <><AssetStoreComponent /></>
  );
};

export default OrganStore;