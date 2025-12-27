import { Suspense, useEffect } from "react";
import { useDispatch, useSelector } from "react-redux";
import { Navigate, Outlet } from "react-router-dom";
import { authService } from "../redux/auth/auth";
import { Spinner } from "reactstrap";
import { ThemeContext } from "styled-components";

const ProtectPublicRoutesLayout = () => {
  
  const { auth } = useSelector((s) => s);
  const dispatch = useDispatch();
  useEffect( () => {
    setTimeout( () => {
      dispatch(authService()).then(() => {
        // dispatch(featchOrgans());
      });
    },200);
  },[]);


  return <>{auth.status == "success"  ? <Outlet /> : auth.status == "false" ? <Navigate to={"/sign"} /> : 
  <Suspense fallback={<Spinner />}>

</Suspense>}</>;
};

export default ProtectPublicRoutesLayout;
