import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { customAxios } from "../services/customAxios";

const initToken = localStorage.getItem("h-token")
  ? localStorage.getItem("h-token")
  : "";

const initUser = localStorage.getItem("h-user")
  ? JSON.parse(localStorage.getItem("h-user"))
  : "";

export const loginUser = createAsyncThunk(
  "login/loginUser",
  async (pass, _) => {
    const user = _.getState().sign.userInput;
    try {
      const res = await customAxios.post("/auth/login", {
        user_name: user,
        password: pass,
      });
      return res.data;
    } catch (err) {
      const customErr = {
        name: "Custom axios error",
        success: err.response.data.success,
        message: err.response.data.errors,
      };
      throw customErr;
    }
  }
);
export const registerUser = createAsyncThunk(
  "login/registerUser",
  async (otp, _) => {
    const user = _.getState().sign.userInput;
    try {
      const res = await customAxios.post("/auth/register", {
        user_name: user,
        otp_code: otp,
      });
      return res.data;
    } catch (err) {
      const customErr = {
        name: "Custom axios error",
        success: err.response.data.success,
        message: err.response.data.errors,
      };
      throw customErr;
    }
  }
);

const initialState = {
  loading: false,
  token: initToken,
  user: initUser,
  error: "",
  register: {
    loading: false,
    error: "",
  },
};

const logSlice = createSlice({
  name: "login",
  initialState,
  reducers: {
    logOut: (state) => {
      state.token = "";
      state.user = "";
      state.error = "";
      localStorage.setItem("h-token", "");
      localStorage.setItem("h-user", "");
    },
    cleaningLoginError: (s) => {
      s.error = "";
    },
    cleaningRegisterError: (s) => {
      s.register.error = "";
    },
  },
  extraReducers: (b) => {
    b.addCase(loginUser.pending, (s, a) => {
      s.loading = true;
      s.error = "";
    });
    b.addCase(loginUser.fulfilled, (s, a) => {
      s.loading = false;
      const { user, token } = a.payload.data;
      s.token = token;
      s.user = user;
      localStorage.setItem("h-token", token);
      localStorage.setItem("h-user", JSON.stringify(user));
      // console.log(a);
    });
    b.addCase(loginUser.rejected, (s, a) => {
      s.loading = false;
      s.error = a.error.message;
    });
    b.addCase(registerUser.pending, (s, a) => {
      s.register.loading = true;
      s.register.error = "";
    });
    b.addCase(registerUser.fulfilled, (s, a) => {
      s.register.loading = false;
      const { user, token } = a.payload.data;
      s.token = token;
      s.user = user;
      localStorage.setItem("h-token", token);
      localStorage.setItem("h-user", JSON.stringify(user));
    });
    b.addCase(registerUser.rejected, (s, a) => {
      s.register.loading = false;
      s.register.error = a.error.message;
    });
  },
});

export const { cleaningLoginError, logOut, cleaningRegisterError } =
  logSlice.actions;

export default logSlice.reducer;
