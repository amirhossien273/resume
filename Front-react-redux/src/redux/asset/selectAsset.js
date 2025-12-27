import { createSlice, createAsyncThunk } from "@reduxjs/toolkit";
import Service from "../../services/api/Service";

const initialState = {
    data: [],
    selectData: {},
    selectDataScor: {},
    selectDataInput: {},
    message: "",
    error: "",
    loading: false,
};

export const featchSelectAssets = createAsyncThunk(
    "featchSelectAssets",
    async() => {
        try {
        const response = await Service.featchSelectAssets();
        return response;
    } catch (err) {
        return rejectWithValue(err.response);
      }
    }
);

const SelectAssetSlice = createSlice({
    name: "selectAsset",
    initialState,
    reducers: {
      addSelectAsset(state, action) {
        Object.assign(state.selectData, action.payload);
      },
      addSelectStoreAsset(state, action) {
        Object.assign(state.selectDataScor, action.payload);
      },
      addSelectAssetInput(state, action){
        Object.assign(state.selectDataInput, action.payload);
      }
    },

    extraReducers: (builder) => {
        builder.addCase(featchSelectAssets.pending, (state) => {
            state.loading = true;
            state.data = [];
          });
          builder.addCase(featchSelectAssets.fulfilled, (state, action) => {
            state.loading = false;
            state.data =  action.payload;
            state.error = "";
          });
          builder.addCase(featchSelectAssets.rejected, (state, action) => {
            state.loading = false;
            state.data = [];
            state.error = action.payload?.data?.message || action.payload?.errors;
          });
    }
});

export const { addSelectAsset, addSelectStoreAsset, addSelectAssetInput } =SelectAssetSlice.actions;
export const SelectAsset = SelectAssetSlice.reducer;

