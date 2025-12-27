import { lazy } from "react";

const LazyOrganStore = lazy(() =>
  import("../../views/findOutput/FindOutput")
);

const FindOutputRouter = [
  {
    path: "/find-output",
    element: <LazyOrganStore />,
  }
];

export default FindOutputRouter;
