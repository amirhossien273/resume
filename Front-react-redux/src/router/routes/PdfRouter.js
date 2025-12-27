import React, { lazy } from "react";
const LazyFinalOutputPage = lazy(() =>
  import("../../views/pdf/FinalOutput")
);

const LazyListOrganPage = lazy(() =>
  import("../../views/pdf/ListOrgan")
);

const PdfRouter = [
  {
    path: "/pdf-final-output",
    element: <LazyFinalOutputPage />,
  },
  {
    path: "/pdf-list-organ",
    element: <LazyListOrganPage />,
  },
];

export default PdfRouter;
