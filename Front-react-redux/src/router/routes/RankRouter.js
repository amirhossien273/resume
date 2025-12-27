import { lazy } from "react";

const LazyRankStore= lazy(() =>
  import("../../views/rank/store")
);

const RankRouter = [
  {
    path: "/ranks",
    element: <LazyRankStore />,
  }
];

export default RankRouter;
