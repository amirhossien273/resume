// ** Router imports
import { useRoutes, Navigate } from "react-router-dom";

// ** GetRoutes
import { DefaultRoute, getRoutes } from "./routes";

// ** Hooks Imports
import { useLayout } from "@hooks/useLayout";
import BlankLayout from "@layouts/BlankLayout";
import Register from "../views/auth/Register";
import Error from "../views/Error";
import Sign from "../views/auth/Sign";
import ProtectAuthRoutesLayout from "../layouts/ProtectAuthRoutesLayout";
import ProtectPublicRoutesLayout from "../layouts/ProtectPublicRoutesLayout";
import LogWithOtp from "../views/auth/LogWithOtp";
import Helpe from "../views/Helpe";
import Dashboard from "../views/Dashboard";

const Router = () => {
  // ** Hooks
  const { layout } = useLayout();

  const allRoutes = getRoutes(layout);

  const routes = useRoutes([
    {
      element: <ProtectAuthRoutesLayout />,
      children: [
        {
          element: <BlankLayout />,
          children: [{ path: "/sign", element: <Sign /> }],
        },
        {
          element: <BlankLayout />,
          children: [{ path: "/register", element: <Register /> }],
        },
        {
          element: <BlankLayout />,
          children: [{ path: "/withotp", element: <LogWithOtp /> }],
        },
      ],
    },
    {
      children: [{ path: "/helpe", element: <Helpe /> }],
    },
    {
      element: <ProtectPublicRoutesLayout />,
      children: [
        
        {
          path: "/",
          index: true,
          element: <Navigate to={DefaultRoute} />,
        },
        ...allRoutes,
      ],
    },
    {
      path: "*",
      element: <BlankLayout />,
      children: [{ path: "*", element: <Error /> }],
    },
  ]);

  return routes;
};

export default Router;
