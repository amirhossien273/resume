import { createSlice, createAsyncThunk } from "@reduxjs/toolkit";
import Service from "../../services/api/Service";

const initialState = {
    data: [],
    selectData: {},
    selectDataScor: {},
    selectDataScorInsert: {},
    message: "",
    error: "",
    loading: false,
};

export const featchSelectThreats = createAsyncThunk(
    "featchSelectThreats",
    async() => {
        try {
        const response = await Service.featchSelectThreats();
        return response;
    } catch (err) {
        return rejectWithValue(err.response);
      }
    }
);

const SelectThreatSlice = createSlice({
    name: "selectThreat",
    initialState,
    reducers: {
      addSelectThreat(state, action) {
        Object.assign(state.selectData, action.payload);
      },
      addSelectScorThreat(state, action) {
        Object.assign(state.selectDataScor, action.payload);
      },

      addSelectThreatInput(state, action) {
        Object.assign(state.selectDataScorInsert, action.payload);
      }
    },
    extraReducers: (builder) => {
        builder.addCase(featchSelectThreats.pending, (state) => {
            state.loading = true;
            state.data = [];
          });
          builder.addCase(featchSelectThreats.fulfilled, (state, action) => {
            state.loading = false;
            state.data =  action.payload;
            state.error = "";
          });
          builder.addCase(featchSelectThreats.rejected, (state, action) => {
            state.loading = false;
            state.data = [];
            state.error = action.payload?.data?.message || action.payload?.errors;
          });
    }
});

export const { addSelectThreat, addSelectScorThreat, addSelectThreatInput } =SelectThreatSlice.actions;
export const SelectThreat = SelectThreatSlice.reducer;

