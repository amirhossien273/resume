import { lazy } from "react";

const LazyFinalChart= lazy(() =>
  import("../../views/chart/finalChart")
);

const ChartRouter = [
  {
    path: "/charts",
    element: <LazyFinalChart />,
  }
];

export default ChartRouter;
