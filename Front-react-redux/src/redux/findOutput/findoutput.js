import { createSlice, createAsyncThunk } from "@reduxjs/toolkit";
import Service from "../../services/api/Service";

const initialState = {
    data: [],
    message: "",
    error: "",
    loading: false,
  };

export const featchFindOutput = createAsyncThunk(
    "fetchFindOutput",
    async() => {
        try {
        const response = await Service.fetchFindOutput();
        return response;
    } catch (err) {
        return rejectWithValue(err.response);
      }
    }
);


const FindOutputSlice = createSlice({
    name: "findOutput",
    initialState,
    reducers: {},
    extraReducers: (builder) => {
        builder.addCase(featchFindOutput.pending, (state) => {
            state.loading = true;
            state.data = [];
          });
          builder.addCase(featchFindOutput.fulfilled, (state, action) => {
            state.loading = false;
            state.data =  action.payload;
            state.error = "";
          });
          builder.addCase(featchFindOutput.rejected, (state, action) => {
            state.loading = false;
            state.data = [];
            state.error = action.payload?.data?.message || action.payload?.errors;
          });
    }
});



export const findOutput = FindOutputSlice.reducer;

export const {setInsertFindOutputClean} = FindOutputSlice.actions;