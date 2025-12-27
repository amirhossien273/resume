import React, { useState } from "react";
import { Button, Card, CardBody, Col, Form, Row, Spinner } from "reactstrap";
import Select from "react-select";
import { Controller, useForm } from "react-hook-form";
import { useDispatch, useSelector } from "react-redux";
import { insertCenter } from "../../redux/center/center";

const CenterStoreComponent = () => {

  const dispatch = useDispatch();

  const { createCenter } = useSelector((s) => s);
  const { loading } = createCenter



    const dataInsertForm = {
    name: "",
    type: "",
    };

const {
  control,
  handleSubmit,
  formState: { errors, isDirty, defaultValues },
} = useForm({
  defaultValues: dataInsertForm,
});

const creatAsset = (data) => {

    console.log(data);
  dispatch(insertCenter(data));
};

const types = 
[
    {
        value: 'حیاتی',
        label: 'حیاتی',
    },
    {
        value: 'حساس',
        label: 'حساس',
    },
    {
        value: 'مهم',
        label: 'مهم',
    },
    {
      value: 'قابل حفاظت',
      label: 'قابل حفاظت'
    }
];

  return (
    <Card className="card col-12 m-auto p-1">
      <CardBody >
        <Form onSubmit={handleSubmit(creatAsset)} class="auth-login-form">
          <Row >
          <Col className="mb-1 col-6">
            <Controller
                rules={{ required: true }}
                control={control}
                name="type"
                render={({ field }) => (
                  <Select
                    id="type"
                    isClearable={false}
                    placeholder="سطح مرکز را انتخاب کنید..."
                    className="react-select"
                    classNamePrefix="select"
                    isMulti={false}
                    // styles={customStyles}
                    inputRef={field.ref}
                    name={field.name}
                    options={types}
                    value={types?.find((c) => c.value === field.value)}
                    onChange={(selectedOption) => {
                      field.onChange(selectedOption.value);
                    }}
                  />
                )}
              />
              {errors.type && <p className="text-danger ms-1 text-end">سطح مرکز را انتخاب کنید!</p>}
            </Col>
            <Col className="mb-1 col-6">
              <Controller
                  rules={{ required: true }}
                  control={control}
                  name="name"
                  render={({ field }) => (
                    <input className={`form-control ${(errors.name) ? 'border-danger': ''}`} {...field}placeholder="نام مرکز"  id="center" type="text"  />
                  )}
                />
                {errors.name && <p className="text-danger ms-1 text-end"> !نام مرکز را وارد کنید</p>}
            </Col>
            <Col className="mb-1 col-12">
              <Button   
                  type="submit"
                  color="primary"
                  disabled={loading} 
                  className="w-50 d-block m-auto">
                    {loading === true ? <Spinner size="sm" /> : ""}
                    <span className="ms-1">ثبت مرکز</span>
                </Button>
            </Col>
          </Row>
        </Form>
      </CardBody>
    </Card>
  );
};

export default CenterStoreComponent;
