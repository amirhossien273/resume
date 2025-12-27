import axios from "axios";
export const BASE_URL = "http://service-user.healon.ir/api";
// export const BASE_URL = "http://service-user.healon.ir/api";
export const USER_URL = "http://service-user.healon.ir/api";
export const DOC_URL = "http://service-doctor.healon.ir/api";
// export const DOC_URL = "http://doc.simorgh.local:8000/api";
// http://service-user.healon.ir
export const MNG_URL = "http://service-manage.healon.ir/api";

export const DOC_TABLE_URL = "http://service-doctor.healon.ir/api";

// axios.defaults.baseURL = BASE_URL;
axios.defaults.headers.common["Accept"] = "application/json";
axios.defaults.headers.common["Content-Type"] = "application/json";

export const customAxios = axios.create({ baseURL: BASE_URL });
export const axiosWithTokenUser = axios.create({ baseURL: USER_URL });
export const axiosWithToken = axios.create({ baseURL: DOC_URL });
export const axiosWithTokenManage = axios.create({ baseURL: MNG_URL });
export const axiosWithTokenDocTable = axios.create({ baseURL: DOC_TABLE_URL });

axiosWithTokenUser.interceptors.request.use((req) => {
  req.headers.Authorization = `Bearer ${localStorage.getItem("h-token")}`;
  return req;
});
axiosWithToken.interceptors.request.use((req) => {
  req.headers.Authorization = `Bearer ${localStorage.getItem("h-token")}`;
  return req;
});
axiosWithTokenManage.interceptors.request.use((req) => {
  req.headers.Authorization = `Bearer ${localStorage.getItem("h-token")}`;
  return req;
});
axiosWithTokenDocTable.interceptors.request.use((req) => {
  req.headers.Authorization = `Bearer ${localStorage.getItem("h-token")}`;
  return req;
});
