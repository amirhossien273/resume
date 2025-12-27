import {  useDispatch, useSelector } from "react-redux";
import { Navigate, Outlet } from "react-router-dom";
import { DefaultRoute } from "../router/routes";
import { useEffect } from "react";
import {authService} from "../redux/auth/auth";
import SigninFormComponent from "../components/auth/SigninFormComponent";

const ProtectAuthRoutesLayout = () => {
  const { auth } = useSelector((s) => s);
  const { signin } = useSelector((s) => s);
  const dispatch = useDispatch();
  useEffect( () => {
    // setTimeout( () => {
      dispatch(authService());
    // },20000000000);
  },[signin]);


  
  return <>{auth.status == "success"  ? <Navigate to={DefaultRoute} />  : auth.status == "false" ? <Outlet /> : <>sss</>}</>;

  // return <>{user?.id ? <Navigate to={DefaultRoute} /> : <Outlet />}</>;
};

export default ProtectAuthRoutesLayout;
