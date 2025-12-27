import { createSlice, createAsyncThunk } from "@reduxjs/toolkit";
import Service from "../../services/api/Service";
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

const centerGroupdInitialState = {
  data: [],
  message: "",
  error: "",
  loading: false,
};


export const featchCenters = createAsyncThunk(
    "fetchCenters",
    async() => {
        try {
        const response = await Service.fetchCenters();
        return response;
    } catch (err) {
        return rejectWithValue(err.response);
      }
    }
);

export const featchCentersGropID = createAsyncThunk(
  "featchCentersGropID",
  async(groupID) => {
      try {
      const response = await Service.fetchCentersGroupID(groupID);
      return response;
  } catch (err) {
      return rejectWithValue(err.response);
    }
  }
);

export const insertCenter = createAsyncThunk(
  "insertCenter",
  async(data) => {
      try {
      const response = await Service.insertCenter(data);

      return response;
  } catch (err) {
      return rejectWithValue(err.response);
    }
  }
);

const CenterSlice = createSlice({
    name: "center",
    initialState,
    reducers: {},
    extraReducers: (builder) => {
        builder.addCase(featchCenters.pending, (state) => {
            state.loading = true;
            state.data = [];
          });
          builder.addCase(featchCenters.fulfilled, (state, action) => {
            state.loading = false;
            state.data =  action.payload;
            state.error = "";
          });
          builder.addCase(featchCenters.rejected, (state, action) => {
            state.loading = false;
            state.data = [];
            state.error = action.payload?.data?.message || action.payload?.errors;
          });
    }
});

const CenterGroupIdSlice = createSlice({
  name: "featchCentersGropID",
  initialState: centerGroupdInitialState,
  reducers: {
    setInsertCenterClean: (state) => {
      state = centerGroupdInitialState;
    },
  },
  extraReducers: (builder) => {
      builder.addCase(featchCentersGropID.pending, (state) => {
          state.loading = true;
          state.data = [];
        });
        builder.addCase(featchCentersGropID.fulfilled, (state, action) => {
          state.loading = false;
          state.data =  action.payload;
          state.error = "";
        });
        builder.addCase(featchCentersGropID.rejected, (state, action) => {
          state.loading = false;
          state.data = [];
          state.error = action.payload?.data?.message || action.payload?.errors;
        });
  }
});

const insertCenterSlice = createSlice({
  name: "insertCenter",
  initialState: initialStateStore,
  reducers: {
    setInsertCenterClean: (state) => {
      state = initialStateStore;
    },
  },
  extraReducers: (builder) => {
      builder.addCase(insertCenter.pending, (state) => {
          state.loading = true;
          state.data = {};
        });
        builder.addCase(insertCenter.fulfilled, (state, action) => {
          state.loading = false;
          state.data =  action.payload;
          state.error = "";
          Notification.fire({
            html: <i>با موفقیت ثبت شد!</i>,
            icon: 'success'
          })
        });
        builder.addCase(insertCenter.rejected, (state, action) => {
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


export const center = CenterSlice.reducer;
export const centerGroupID = CenterGroupIdSlice.reducer;
export const createCenter = insertCenterSlice.reducer;

export const {setInsertCenterClean} = CenterSlice.actions;