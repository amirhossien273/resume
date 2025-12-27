import React from "react";
import { Button, Card, CardBody, Col, Form, Row, Spinner } from "reactstrap";
import Select from "react-select";
import { Controller, useForm } from "react-hook-form";
import { useDispatch, useSelector } from "react-redux";
import { featchOrgans, insertGroup } from "../../redux/organ/organ";

const OrganStoreComponent = () => {

  const dispatch = useDispatch();
  const { loading } = useSelector((s) => s.insertOrgan);

  const dataInsertForm = {
    name: "",
  };

  const {
    control,
    handleSubmit,
    formState: { errors, isDirty, defaultValues },
  } = useForm({
    defaultValues: dataInsertForm,
  });

  const creatOrgan = (data) => {
    dispatch(insertGroup(data)).then(
      dispatch(featchOrgans())
    );
  };

  const types = 
[
    {
      label: 'معاونت دستگاهی',
      value: 1,
    },
    {
      label: 'معاونت موضوعی',
      value: 2,
    },
    {
      label: 'قرار گاه ها',
      value: 3,
    }
];

  return (
    <>
    <Card className="card col-12 m-auto p-1">
      <CardBody >
        <Form onSubmit={handleSubmit(creatOrgan)} class="auth-login-form">
          <Row >
          <Col className="mb-1 col-6">
            <Controller
                rules={{ required: true }}
                control={control}
                name="categroy_id"
                render={({ field }) => (
                  <Select
                    id="category"
                    isClearable={false}
                    placeholder="نوع دارایی را انتخاب کنید..."
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
              {errors.type && <p className="text-danger ms-1 text-end">قرارگاه را انتخاب کنید!</p>}
            </Col>
            <Col className="mb-1 col-6">

            <Controller
                rules={{ required: true }}
                control={control}
                name="name"
                render={({ field }) => (
                  <input className={`form-control ${(errors.name) ? 'border-danger': ''}`} {...field}placeholder="نام قرارگاه"  id="groupe" type="text"  />
                )}
              />
              {errors.name && <p className="text-danger ms-1 text-end"> !نام قرارگاه را وارد کنید</p>}
            </Col>
            <Col className="mb-1 col-12">
            <Button   
                type="submit"
                color="primary"
                disabled={loading} 
                className="w-50 d-block m-auto">
                  {loading === true ? <Spinner size="sm" /> : ""}
                  <span className="ms-1">ثبت قرارگاه</span>
                </Button>
            </Col>
          </Row>
        </Form>
      </CardBody>
    </Card>
    </>
  );
};

export default OrganStoreComponent;
