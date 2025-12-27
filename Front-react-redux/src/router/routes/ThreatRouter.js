import { lazy } from "react";

const LazyThreatStore= lazy(() =>
  import("../../views/threat/threatStore")
);

const ThreatRouter = [
  {
    path: "/threats",
    element: <LazyThreatStore />,
  }
];

export default ThreatRouter;
