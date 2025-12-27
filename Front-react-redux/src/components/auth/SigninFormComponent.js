import "@styles/react/pages/page-authentication.scss";
import { useDispatch, useSelector } from "react-redux";
import logo from "@src/assets/images/logo/organ.png";
import risck from "@src/assets/images/pages/risk.jpg";
import { Button, Card, CardBody, CardHeader, Col, Form, Spinner } from "reactstrap";
import { Controller, useForm } from "react-hook-form";
import { signinServer } from "../../redux/auth/signin";
import SelectAssetModel from "../asset/SelectAssetModelComponent";
import { useState } from "react";

const SigninFormComponent = () => {


 const dispatch = useDispatch();
 const { loading } = useSelector((s) => s.signin);
 const signinForm = {
    phone:"",
    password:""
  };

  const {
    control,
    handleSubmit,
    formState: { errors, isDirty, defaultValues },
  } = useForm({
    defaultValues: signinForm,
  });

  const siginForm = (data) => {
    dispatch(signinServer(data));
  };
  return (
    <div className="d-flex align-items-center justify-content-center vw-100 vh-100 ">
      <Card className="card col-8 m-auto p-1">
        <div className="row">
        <div className="col-6">
        <img src={risck} />
        <p className="text-center">داشبورد مدیریتی نظام مسائل و شناسایی ریسک پذیریی پروژه کسری خدمت</p>
      </div>
        <div className="col-6">
          <CardHeader className=" text-center m-auto">
            <h2 className="fw-bolder mb-1 text-primary card-title m-auto ">
              <img src={logo} />
              <Col className="col-12">
                سازمان پروژه کسری خدمت
              </Col>
            </h2>
          </CardHeader>
          <CardBody >
            <Form onSubmit={handleSubmit(siginForm)} className="auth-login-form">
              <Col className="mb-1">
                <Controller
                  rules={{ required: true }}
                  control={control}
                  name="phone"
                  render={({ field }) => (
                    <input className={`form-control ${(errors.phone) ? 'border-danger': ''}`} {...field} placeholder="نام کاربری" id="username" type="text"  />
                  )}
                />
                {errors.phone && <p className="text-danger ms-1 text-end"> !نام کاربری خود را وارد کنید</p>}
              </Col>
              <Col className="mb-1">
              <Controller
                  rules={{ required: true }}
                  control={control}
                  name="password"
                  render={({ field }) => (
                    <input  {...field} placeholder="رمز عبور" id="password" type="password" className={`form-control ${(errors.password) ? 'border-danger': ''}`}  />
                  )}
                />
                {errors.password && <p className="text-danger ms-1 text-end"> !رمز عبور  خود را وارد کنید</p>}
              </Col>
              <Col className="mb-1 col-12">
                <Button   
                  type="submit"
                  color="primary"
                  disabled={loading} 
                  className="w-100 d-block m-auto">
                    {loading === true ? <Spinner size="sm" /> : ""}
                    <span className="ms-1">ورود</span>
                  </Button>
              </Col>
          </Form>
          </CardBody>
      </div>
      </div>
    </Card>
  </div>
  );
};

export default SigninFormComponent;