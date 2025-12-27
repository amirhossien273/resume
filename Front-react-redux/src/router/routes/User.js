import { lazy } from "react";

const LazyRegister = lazy(() =>
  import("../../views/auth/Register")
);

const LazyDashboard = lazy(() =>
  import("../../views/Dashboard")
);


const LazyUsers= lazy(() =>
  import("../../views/users/users")
);

const UserRoutes = [
  { path: "/dashboard", element: <LazyDashboard /> },
  {
    path: "/creat-user",
    element: <LazyRegister />,
  },
  {
    path: "/users",
    element: <LazyUsers />,
  }
];

export default UserRoutes;
