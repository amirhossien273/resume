import { createSlice, createAsyncThunk } from "@reduxjs/toolkit";
import Service from "../../services/api/Service";
import toast from "react-hot-toast";

const initialState = {
    accessToken:  localStorage.getItem("user-token")
    ? JSON.parse(localStorage.getItem("user-token")).accessToken
    : "",
    user: {},
    message: "",
    error: "",
    loading: false,
    status: ""
  };


export const authService = createAsyncThunk(
  "authService",
  async() => {
      try {
      const response = await Service.auth();
      return response;
  } catch (err) {
      return rejectWithValue(err.response);
    }
  }
);

const authSlice = createSlice({
  name: "auth",
  initialState,
  reducers: {},
  extraReducers: (builder) => {
      builder.addCase(authService.pending, (state) => {
          state.loading = true;
          state.user = {};
          state.status = "panding";
        });
        builder.addCase(authService.fulfilled, (state, action) => {
          state.loading = false;
          state.user =  action.payload;
          state.error = "";
          toast.success("با موفقیت وارد شدید!");
          state.status = "success";
        });
        builder.addCase(authService.rejected, (state, action) => {
          state.loading = false;
          state.user = {};
          state.error = action.payload?.data?.message || action.payload?.errors;
          state.status = "false";
          toast.error("با خطا مواجه شدید");
        });
  }
})

export const {} = authSlice.actions;

export default authSlice.reducer;