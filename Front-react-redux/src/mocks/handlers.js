import { rest } from "msw";
import { BASE_URL, USER_URL, DOC_URL, MNG_URL } from "../services/customAxios";

const fakeToken = "itisnotfaketokenitisfoken!";
const user = {
  id: 11,
  mobile: "09211112121",
  first_name: "hesam",
  last_name: "amiri",
  email: "hsm@gmail.com",
  mobile_verified_at: "2023-05-14 08:04:47",
  gender_enum: "male",
  birthday: "1983-08-01",
  is_active: 1,
  created_at: "2023-05-14T08:04:47.000000Z",
  updated_at: "2023-05-22T11:55:31.000000Z",
  deleted_at: null,
};

export const handlers = [
  rest.post(`${BASE_URL}/auth/sign`, async (req, res, ctx) => {
    const { user_name } = await req.json();
    if (user_name === "09221112222") {
      return res(
        ctx.status(200),
        ctx.json({ success: true, data: { exist: true } })
      );
    }
    return res(
      ctx.status(200),
      ctx.json({ success: true, data: { exist: false } })
    );
  }),
  rest.post(`${BASE_URL}/auth/login`, async (req, res, ctx) => {
    const { user_name, password } = await req.json();
    if (user_name === "09221112222" && password === "321") {
      return res(
        ctx.status(200),
        ctx.json({ data: { success: true, token: fakeToken, user } })
      );
    }
    return res(
      ctx.status(422),
      ctx.json({ success: false, errors: "username or password is invalid" })
    );
  }),
  rest.post(`${BASE_URL}/auth/send/otp`, async (req, res, ctx) => {
    return res(
      ctx.status(200),
      ctx.json({
        success: true,
        data: {
          otp_code: 66543,
        },
      })
    );
  }),
  rest.post(`${BASE_URL}/auth/register`, async (req, res, ctx) => {
    const { otp_code } = await req.json();
    if (otp_code === "66543") {
      return res(
        ctx.status(200),
        ctx.json({ success: true, data: { token: fakeToken, user } })
      );
    }
    return res(
      ctx.status(403),
      ctx.json({ success: true, errors: "username or code is invalid" })
    );
  }),
  rest.get(`${BASE_URL}/user/11`, async (req, res, ctx) => {
    const { networkError } = await res;
    return res(ctx.status(200), ctx.json({ data: { user } }));
  }),
];
