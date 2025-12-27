import { lazy } from "react";

const LazyOrganStore = lazy(() =>
  import("../../views/organ/OrganStore")
);

const OrganRouter = [
  {
    path: "/organ",
    element: <LazyOrganStore />,
  }
];

export default OrganRouter;
