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

export const featchOrgans = createAsyncThunk(
    "fetchOrgans",
    async() => {
        try {
        const response = await Service.fetchGroups();
        return response;
    } catch (err) {
        return rejectWithValue(err.response);
      }
    }
);

export const insertGroup = createAsyncThunk(
  "insertGroup",
  async(data) => {
      try {
      const response = await Service.insertGroup(data);
      // console.log("responseresponse: ",response);

      return response;
  } catch (err) {
      return rejectWithValue(err.response);
    }
  }
);

const OrganSlice = createSlice({
    name: "organ",
    initialState,
    reducers: {},
    extraReducers: (builder) => {
        builder.addCase(featchOrgans.pending, (state) => {
            state.loading = true;
            state.data = [];
          });
          builder.addCase(featchOrgans.fulfilled, (state, action) => {
            state.loading = false;
            state.data =  action.payload;
            state.error = "";
          });
          builder.addCase(featchOrgans.rejected, (state, action) => {
            state.loading = false;
            state.data = [];
            state.error = action.payload?.data?.message || action.payload?.errors;
          });
    }
});

const insertOrganSlice = createSlice({
  name: "insertOrgan",
  initialState: initialStateStore,
  reducers: {
    setInsertOrganClean: (state) => {
      state = initialStateStore;
    },
  },
  extraReducers: (builder) => {
      builder.addCase(insertGroup.pending, (state) => {
          state.loading = true;
          state.data = {};
        });
        builder.addCase(insertGroup.fulfilled, (state, action) => {
          state.loading = false;
          state.data =  action.payload;
          state.error = "";
          Notification.fire({
            html: <i>با موفقیت ثبت شد!</i>,
            icon: 'success'
          })
        });
        builder.addCase(insertGroup.rejected, (state, action) => {
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


export const organ = OrganSlice.reducer;
export const insertOrgan = insertOrganSlice.reducer;

export const {setInsertOrganClean} = OrganSlice.actions;