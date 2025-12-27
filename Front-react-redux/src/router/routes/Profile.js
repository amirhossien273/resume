import React, { lazy } from "react";
const LazyDoctorProfilePage = lazy(() =>
  import("../../views/profile/details")
);

const ProfileRoutes = [
  {
    path: "/profile",
    element: <LazyDoctorProfilePage />,
  },
];

export default ProfileRoutes;
