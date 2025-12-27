import { createSlice, createAsyncThunk } from "@reduxjs/toolkit";
import Service from "../../services/api/Service";
import toast from "react-hot-toast";

const initialState = {
    data: [],
    message: "",
    error: "",
    loading: false,
  };

export const featchUsers = createAsyncThunk(
    "fetchUsers",
    async() => {
        try {
        const response = await Service.fetchUsers();
        return response;
    } catch (err) {
        return rejectWithValue(err.response);
      }
    }
);


const UserSlice = createSlice({
    name: "user",
    initialState,
    reducers: {},
    extraReducers: (builder) => {
        builder.addCase(featchUsers.pending, (state) => {
            state.loading = true;
            state.data = [];
          });
          builder.addCase(featchUsers.fulfilled, (state, action) => {
            state.loading = false;
            state.data =  action.payload;
            state.error = "";
          });
          builder.addCase(featchUsers.rejected, (state, action) => {
            state.loading = false;
            state.data = [];
            state.error = action.payload?.data?.message || action.payload?.errors;
          });
    }
});



export const user = UserSlice.reducer;

export const {setInsertUserClean} = UserSlice.actions;