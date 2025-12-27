import { createSlice, createAsyncThunk } from "@reduxjs/toolkit";
import Service from "../../services/api/Service";
import toast from "react-hot-toast";

const initialState = {
    data: {},
    message: "",
    error: "",
    loading: false,
  };

export const signinServer = createAsyncThunk(
    "signin",
    async(payload) => {
        try {
        const response = await Service.signin(payload);
        return response;
    } catch (err) {
        return rejectWithValue(err.response);
      }
    }
);

const signinSlice = createSlice({
    name: "signin",
    initialState,
    reducers: {},
    extraReducers: (builder) => {
        builder.addCase(signinServer.pending, (state) => {
            state.loading = true;
            state.data = {};
          });
          builder.addCase(signinServer.fulfilled, (state, action) => {
            localStorage.setItem("user-token", JSON.stringify(action.payload));
            state.loading = false;
            state.data =  action.payload;
            state.error = "";
            toast.success();
          });
          builder.addCase(signinServer.rejected, (state, action) => {
            state.loading = false;
            state.data = {};
            state.error = action.payload?.data?.message || action.payload?.errors;
            toast.error(action.payload?.data?.message);
          });
    }
})

export const {} = signinSlice.actions;

export default signinSlice.reducer;