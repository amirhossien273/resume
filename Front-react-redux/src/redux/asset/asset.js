import { createSlice, createAsyncThunk } from "@reduxjs/toolkit";
import Service from "../../services/api/Service";
import toast from "react-hot-toast";
import Swal from "sweetalert2";
import withReactContent from "sweetalert2-react-content";
const Notification = withReactContent(Swal);

const initialState = {
    data: [],
    message: "",
    error: "",
    loading: false,
  };

const initialStateStore = {
  data: {},
  message: "",
  error: "",
  loading: false,
};

const assetGroupdInitialState = {
  data: [],
  message: "",
  error: "",
  loading: false,
};


export const featchAssets = createAsyncThunk(
    "fetchAssets",
    async() => {
        try {
        const response = await Service.fetchAssets();
        return response;
    } catch (err) {
        return rejectWithValue(err.response);
      }
    }
);

export const featchAssetsGropID = createAsyncThunk(
  "featchAssetsGropID",
  async(groupID) => {
      try {
      const response = await Service.fetchAssetsGroupID(groupID);
      return response;
  } catch (err) {
      return rejectWithValue(err.response);
    }
  }
);

export const insertAsset = createAsyncThunk(
  "insertAsset",
  async(data) => {
      try {
      const response = await Service.insertAsset(data);

      return response;
  } catch (err) {
      return rejectWithValue(err.response);
    }
  }
);

const AssetSlice = createSlice({
    name: "asset",
    initialState,
    reducers: {},
    extraReducers: (builder) => {
        builder.addCase(featchAssets.pending, (state) => {
            state.loading = true;
            state.data = [];
          });
          builder.addCase(featchAssets.fulfilled, (state, action) => {
            state.loading = false;
            state.data =  action.payload;
            state.error = "";
          });
          builder.addCase(featchAssets.rejected, (state, action) => {
            state.loading = false;
            state.data = [];
            state.error = action.payload?.data?.message || action.payload?.errors;
          });
    }
});

const AssetGroupIdSlice = createSlice({
  name: "featchAssetsGropID",
  initialState: assetGroupdInitialState,
  reducers: {
    setInsertAssetClean: (state) => {
      state = assetGroupdInitialState;
    },
  },
  extraReducers: (builder) => {
      builder.addCase(featchAssetsGropID.pending, (state) => {
          state.loading = true;
          state.data = [];
        });
        builder.addCase(featchAssetsGropID.fulfilled, (state, action) => {
          state.loading = false;
          state.data =  action.payload;
          state.error = "";
        });
        builder.addCase(featchAssetsGropID.rejected, (state, action) => {
          state.loading = false;
          state.data = [];
          state.error = action.payload?.data?.message || action.payload?.errors;
        });
  }
});

const insertAssetSlice = createSlice({
  name: "insertAsset",
  initialState: initialStateStore,
  reducers: {
    setInsertAssetClean: (state) => {
      state = initialStateStore;
    },
  },
  extraReducers: (builder) => {
      builder.addCase(insertAsset.pending, (state) => {
          state.loading = true;
          state.data = {};
        });
        builder.addCase(insertAsset.fulfilled, (state, action) => {
          state.loading = false;
          state.data =  action.payload;
          state.error = "";
          Notification.fire({
            html: <i>با موفقیت ثبت شد!</i>,
            icon: 'success'
          })
        });
        builder.addCase(insertAsset.rejected, (state, action) => {
          state.loading = false;
          state.data = {};
          state.error = action.payload?.data?.message || action.payload?.errors;
          Notification.fire({
            html: <i>با خطا مواجه شد دوباره تلاش کنید!</i>,
            icon: 'error'
          })
        });
  }
});


export const asset = AssetSlice.reducer;
export const assetGroupID = AssetGroupIdSlice.reducer;
export const createAsset = insertAssetSlice.reducer;

export const {setInsertAssetClean} = AssetSlice.actions;