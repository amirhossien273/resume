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

export const featchRanks = createAsyncThunk(
    "fetchRanks",
    async() => {
        try {
        const response = await Service.fetchRanks();
        return response;
    } catch (err) {
        return rejectWithValue(err.response);
      }
    }
);

export const insertRank = createAsyncThunk(
  "insertRank",
  async(data) => {
      try {
      const response = await Service.insertRank(data);

      return response;
  } catch (err) {
      return rejectWithValue(err.response);
    }
  }
);

const RankSlice = createSlice({
    name: "rank",
    initialState,
    reducers: {},
    extraReducers: (builder) => {
        builder.addCase(featchRanks.pending, (state) => {
            state.loading = true;
            state.data = [];
          });
          builder.addCase(featchRanks.fulfilled, (state, action) => {
            state.loading = false;
            state.data =  action.payload;
            state.error = "";
          });
          builder.addCase(featchRanks.rejected, (state, action) => {
            state.loading = false;
            state.data = [];
            state.error = action.payload?.data?.message || action.payload?.errors;
          });
    }
});

const insertRankSlice = createSlice({
  name: "insertRank",
  initialState: initialStateStore,
  reducers: {
    setInsertRankClean: (state) => {
      state = initialStateStore;
    },
  },
  extraReducers: (builder) => {
      builder.addCase(insertRank.pending, (state) => {
          state.loading = true;
          state.data = {};
        });
        builder.addCase(insertRank.fulfilled, (state, action) => {
          state.loading = false;
          state.data =  action.payload;
          state.error = "";
          Notification.fire({
            html: <i>با موفقیت ثبت شد!</i>,
            icon: 'success'
          })
        });
        builder.addCase(insertRank.rejected, (state, action) => {
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


export const rank = RankSlice.reducer;
export const createRank = insertRankSlice.reducer;

export const {setInsertRankClean} = RankSlice.actions;