import { lazy } from "react";

const LazyAssetStore = lazy(() =>
  import("../../views/asset/AssetStore")
);

const LazyListAssetGroupId = lazy(() =>
  import("../../views/asset/ListAssetGroupId")
);

const AssetRouter = [
  {
    path: "/asset",
    element: <LazyAssetStore />,
  },
  {
    path: "/show-list-asset/:groupID",
    element: <LazyListAssetGroupId />,
  }
];

export default AssetRouter;
