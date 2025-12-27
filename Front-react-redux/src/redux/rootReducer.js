// ** Reducers Imports
import layout from "./layout";
import navbar from "./navbar";
import signin from "./auth/signin";
import auth from "./auth/auth";
import signup from "./auth/signup";
import { organ, insertOrgan } from "./organ/organ";
import { asset, createAsset, assetGroupID } from "./asset/asset";
import { center, createCenter } from "./center/center";
import { SelectAsset } from "./asset/selectAsset";
import { SelectThreat } from "./threat/selectThreat";
import { SelectVulnerability } from "./vulnerability/selectVulnerability";
import { threat, createThreat } from "./threat/threat";
import { rank, createRank } from "./rank/Rank";
import { user } from "./user/user";
import { findOutput } from "./findOutput/findoutput";
import { vulnerability, createVulnerability } from "./vulnerability/vulnerability";

const rootReducer = {
  navbar,
  layout,
  signin,
  auth,
  signup,
  organ,
  insertOrgan,
  asset,
  assetGroupID,
  createAsset,
  threat,
  createThreat,
  vulnerability,
  createVulnerability,
  user,
  SelectAsset,
  SelectThreat,
  rank,
  createRank,
  findOutput,
  SelectVulnerability,
  center,
  createCenter
};

export default rootReducer;
