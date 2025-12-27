import { lazy } from "react";

const LazyCenterStore = lazy(() =>
  import("../../views/center/CenterStore")
);


const CenterRouter = [
  {
    path: "/center",
    element: <LazyCenterStore />,
  }
];

export default CenterRouter;
