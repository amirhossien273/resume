import React, { useEffect } from "react";
import { Controller, useForm } from "react-hook-form";
import { useDispatch, useSelector } from "react-redux";
import { Button, Card, CardBody, Col, Form, Row, Spinner } from "reactstrap";
import Select from "react-select";
import { signupServer } from "../../redux/auth/signup";
import { featchOrgans } from "../../redux/organ/organ";

const SignupFormComponent = () => {

  const dispatch = useDispatch();
  const { organ } = useSelector((s) => s);
  const { loading } = useSelector((s) => s.signup);
  const signUpForm = {
    name: "",
    last_name: "",
    national_code: "",
    phone: "",
    password: "",
    role: ["admin"],
    groups: ""
   };
  
   const organs  = [];
   organ?.data?.map((item) => {
      item.organ.map( (value) => {
        organs.push({
          value: value.id,
          label: `${item.name} > ${value.name}`,
        });
      })
  });
  //  console.log("organsorgans", organs);
   const {
    control,
    handleSubmit,
    formState: { errors, isDirty, defaultValues },
  } = useForm({
    defaultValues: signUpForm,
  });
  
  useEffect(() =>{
    dispatch(featchOrgans());
  },[])

  const creatUser = (data) => {
    dispatch(signupServer({
      name: data.name,
      last_name: data.last_name,
      national_code: data.national_code,
      phone: data.phone,
      password: data.password,
      role: data.role,
      groups: [data.groups]
    }));
  };
  return (
    <>
    <Card className="card col-12 m-auto p-1">
      <CardBody >
        <Form onSubmit={handleSubmit(creatUser)} className="auth-login-form">
          <Row >
            <Col className="mb-1 col-6">
            <Controller
                rules={{ required: true }}
                control={control}
                name="name"
                render={({ field }) => (
                  <input className={`form-control ${(errors.name) ? 'border-danger': ''}`} {...field} placeholder="نام" id="name" type="text"  />
                )}
              />
              {errors.name && <p className="text-danger ms-1 text-end"> !نام را وارد کنید</p>}
            </Col>
            <Col className="mb-1 col-6">
            <Controller
                rules={{ required: true }}
                control={control}
                name="last_name"
                render={({ field }) => (
                  <input className={`form-control ${(errors.last_name) ? 'border-danger': ''}`} {...field} placeholder="نام خانوادگی" id="lastname" type="text"  />
                )}
              />
              {errors.last_name && <p className="text-danger ms-1 text-end"> !نام خانوادگی را وارد کنید</p>}
            </Col>
            <Col className="mb-1 col-6">
            <Controller
                rules={{ required: true }}
                control={control}
                name="national_code"
                render={({ field }) => (
                  <input className={`form-control ${(errors.national_code) ? 'border-danger': ''}`} {...field} placeholder="کد ملی" id="nationalCode" type="text"  />
                )}
              />
              {errors.national_code && <p className="text-danger ms-1 text-end"> !کد ملی خود را وارد کنید</p>}
            </Col>
            <Col className="mb-1 col-6">
            <Controller
                rules={{ required: true }}
                control={control}
                name="phone"
                render={({ field }) => (
                  <input className={`form-control ${(errors.phone) ? 'border-danger': ''}`} {...field} placeholder="شماره همراه" id="phone" type="text"  />
                )}
              />
              {errors.phone && <p className="text-danger ms-1 text-end"> !شماره همراه خود را وارد کنید</p>}
            </Col>
            <Col className="mb-1 col-6">
            <Controller
                rules={{ required: true }}
                control={control}
                name="groups"
                render={({ field }) => (
                  <Select
                    id="icd_ten_id"
                    isClearable={false}
                    placeholder="قرارگاه را انتخاب کنید..."
                    className="react-select"
                    classNamePrefix="select"
                    isMulti={false}
                    // styles={customStyles}
                    inputRef={field.ref}
                    name={field.name}
                    options={organs}
                    value={organs?.find((c) => c.value === field.value)}
                    onChange={(selectedOption) => {
                      field.onChange(selectedOption.value);
                    }}
                  />
                )}
              />
              {errors.phone && <p className="text-danger ms-1 text-end"> !نام کاربری خود را وارد کنید</p>}
            </Col>
            <Col className="mb-1 col-6">
            <Controller
                rules={{ required: true }}
                control={control}
                name="password"
                render={({ field }) => (
                  <input className={`form-control ${(errors.password) ? 'border-danger': ''}`} {...field} placeholder="رمز عبور" id="password" type="text"  />
                )}
              />
              {errors.password && <p className="text-danger ms-1 text-end"> !رمز عبور را وارد کنید</p>}
            </Col>
            <Col className="mb-1 col-6">
            <Controller
                rules={{ required: true }}
                control={control}
                name="password"
                render={({ field }) => (
                  <input className={`form-control ${(errors.password) ? 'border-danger': ''}`} {...field} placeholder="تکرار رمز عبور"  id="confirm-password" type="text"  />
                )}
              />
              {errors.password && <p className="text-danger ms-1 text-end"> !تکرار رمز عبور را وارد کنید</p>}
            </Col>
            <Col className="mb-1 col-12">
            <Button   
                type="submit"
                color="primary"
                disabled={loading} 
                className=" d-block m-auto">
                  {loading === true ? <Spinner size="sm" /> : ""}
                  <span className="ms-1">ثبت کاربر</span>
                </Button>
            </Col>
          </Row>
        </Form>
      </CardBody>
    </Card>
    </>
  );
};

export default SignupFormComponent;
