import { createSlice, createAsyncThunk } from "@reduxjs/toolkit";
import Service from "../../services/api/Service";
import toast from "react-hot-toast";
import Swal from "sweetalert2";
import withReactContent from "sweetalert2-react-content";
const Notification = withReactContent(Swal);

const initialState = {
    data: {},
    message: "",
    error: "",
    loading: false,
  };

export const signupServer = createAsyncThunk(
    "signup",
    async(payload) => {
        try {
        const response = await Service.signup(payload);
        return response;
    } catch (err) {
        return rejectWithValue(err.response);
      }
    }
);

const signupSlice = createSlice({
    name: "signup",
    initialState,
    reducers: {},
    extraReducers: (builder) => {
        builder.addCase(signupServer.pending, (state) => {
            state.loading = true;
            state.data = {};
          });
          builder.addCase(signupServer.fulfilled, (state, action) => {
            state.loading = false;
            state.data =  action.payload;
            state.error = "";
            // toast.success();
            Notification.fire({
              html: <i>با موفقیت ثبت شد!</i>,
              icon: 'success'
            })
          });
          builder.addCase(signupServer.rejected, (state, action) => {
            state.loading = false;
            state.data = {};
            state.error = action.payload?.data?.message || action.payload?.errors;
            // toast.error(action.payload?.data?.message);
            Notification.fire({
              html: <i>با خطا مواجه شد دوباره تلاش کنید!</i>,
              icon: 'error'
            })
          });
    }
})

export const {} = signupSlice.actions;

export default signupSlice.reducer;