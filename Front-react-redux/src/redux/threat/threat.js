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

export const featchThreats = createAsyncThunk(
    "fetchThreats",
    async() => {
        try {
        const response = await Service.fetchThreats();
        return response;
    } catch (err) {
        return rejectWithValue(err.response);
      }
    }
);

export const insertThreat = createAsyncThunk(
  "insertThreat",
  async(data) => {
      try {
      const response = await Service.insertThreat(data);

      return response;
  } catch (err) {
      return rejectWithValue(err.response);
    }
  }
);

const ThreatSlice = createSlice({
    name: "threat",
    initialState,
    reducers: {},
    extraReducers: (builder) => {
        builder.addCase(featchThreats.pending, (state) => {
            state.loading = true;
            state.data = [];
          });
          builder.addCase(featchThreats.fulfilled, (state, action) => {
            state.loading = false;
            state.data =  action.payload;
            state.error = "";
          });
          builder.addCase(featchThreats.rejected, (state, action) => {
            state.loading = false;
            state.data = [];
            state.error = action.payload?.data?.message || action.payload?.errors;
          });
    }
});

const insertThreatSlice = createSlice({
  name: "insertThreat",
  initialState: initialStateStore,
  reducers: {
    setInsertThreatClean: (state) => {
      state = initialStateStore;
    },
  },
  extraReducers: (builder) => {
      builder.addCase(insertThreat.pending, (state) => {
          state.loading = true;
          state.data = {};
        });
        builder.addCase(insertThreat.fulfilled, (state, action) => {
          state.loading = false;
          state.data =  action.payload;
          state.error = "";
          Notification.fire({
            html: <i>با موفقیت ثبت شد!</i>,
            icon: 'success'
          })
        });
        builder.addCase(insertThreat.rejected, (state, action) => {
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


export const threat = ThreatSlice.reducer;
export const createThreat = insertThreatSlice.reducer;

export const {setInsertThreatClean} = ThreatSlice.actions;