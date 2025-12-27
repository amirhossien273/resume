import React, { useState } from "react";
import Select from "react-select";
import { Button, Card, CardBody, Col, Form, Row, Spinner } from "reactstrap";
import { useDispatch, useSelector } from "react-redux";
import { Controller, useFieldArray, useForm  } from "react-hook-form";
import { useEffect } from "react";
import { featchvulnerabilities } from "../../redux/vulnerability/vulnerability";
import { insertRank } from "../../redux/rank/Rank";
import { Archive, Plus } from "react-feather";

const RankStorCoponent = () => {

  const dispatch = useDispatch();
  const { vulnerability } = useSelector((s) => s);
  const { loading } = useSelector((s) => s.createThreat);

  const [isSelectTravelModalOpen, setIsSelectTravelModalOpen] = useState(false);

  const toggleSelectTravelModal = () => {
    setIsSelectTravelModalOpen(!isSelectTravelModalOpen);
  };

  const handleSelectTravelButtonClick = (appointmentId, userId) => {
    setIsSelectTravelModalOpen(true);
  };

  const threatForm = {
    vulnerability_id: ""
   };

   const {
    control,
    handleSubmit,
    formState: { errors, isDirty, defaultValues },
  } = useForm({
    defaultValues: threatForm,
  });

  useEffect(() =>{
    dispatch(featchvulnerabilities());
    appendForm();
  },[]);

  const appendForm = () => {
    append({ description: "", rank: "" })
  }
  const creatVulnerability = (data) => {
    // console.log(data);
    dispatch(insertVulnerability(data));
  };

  const ranks = [
        {
            value: 1,
            label: 1,
        },
        {
            value: 2,
            label: 2,
        },
        {
            value: 3,
            label: 3,
        },
        {
            value: 4,
            label: 4,
        },
        {
            value: 5,
            label: 5,
        },
        {
            value: 6,
            label: 6,
        },
        {
            value: 7,
            label: 7,
        },
        {
            value: 8,
            label: 8,
        },
        {
            value: 9,
            label: 9,
        },
        {
            value: 10,
            label: 10,
        }
    ];

    const { fields, append, remove } = useFieldArray({
        control,
        name: "ranks"
    });

   const vulnerabilities = vulnerability?.data?.map((item) => {
    return {
      value: item.id,
      label: `${item.centerName} > ${item.assetName} > ${item.threatName} >  ${item.name}`,
    };
  });

  const creatRank = (data) => {
    // console.log(data);
    dispatch(insertRank(data));
  };

  // console.log("vulnerabilityvulnerability: ", vulnerability);
  return (
    <>
    <Card className="card col-12 m-auto p-1">
      <CardBody>
        <Form onSubmit={handleSubmit(creatRank)} class="auth-login-form">
          <Row>
            <Col className="mb-1 col-6">
            <Controller
                rules={{ required: true }}
                control={control}
                name="vulnerability_id"
                render={({ field }) => (
                  <Select
                    id="vulnerability_id"
                    isClearable={false}
                    placeholder="تهدیدات را انتخاب کنید..."
                    className="react-select"
                    classNamePrefix="select"
                    isMulti={false}
                    // styles={customStyles}
                    inputRef={field.ref}
                    name={field.name}
                    options={vulnerabilities}
                    value={vulnerabilities?.find((c) => c.value === field.value)}
                    onChange={(selectedOption) => {
                      field.onChange(selectedOption.value);
                    }}
                  />
                )}
              />
              {errors.vulnerability_id && <p className="text-danger ms-1 text-end">دارایی را انتخاب کنید!</p>}
            </Col>

            <Col className="mb-1 col-12">
                {fields.map((item, index) => (
                  <Row style={{background: "#cccccc54"}} className="p-1 mb-1 ms-0 mx-1" key={item.id}>
                    <Col className="col-6">
                      <Controller
                        name={`ranks.${index}.description`}
                        control={control}
                        render={({ field }) => <input className={`form-control`} {...field} {...field} />}
                      />
                    </Col>
                    <Col className="col-4">
                      <Controller
                        name={`ranks.${index}.rank`}
                        control={control}
                        render={({ field }) => (
                          <Select
                            id="rank"
                            isClearable={false}
                            placeholder="امتیاز را انتخاب کنید..."
                            className="react-select"
                            classNamePrefix="select"
                            isMulti={false}
                            // styles={customStyles}
                            inputRef={field.ref}
                            name={field.name}
                            options={ranks}
                            value={ranks?.find((c) => c.value === field.value)}
                            onChange={(selectedOption) => {
                              field.onChange(selectedOption.value);
                            }}
                          />
                        )}
                      />
                    </Col>
                    <Col className="col-2">
                      <Button color="danger" type="button" onClick={() => remove(index)}>حذف <Archive /></Button>
                    </Col>
                  </Row>
                ))}
                <button
                  type="button"
                  onClick={() => appendForm()}
                  className="btn btn-bitbucket d-block m-auto"
                >
                  <Plus />
                </button>
            </Col>

            <Col className="mb-1 col-12">
            <Button   
                type="submit"
                color="primary"
                disabled={loading} 
                className="w-50 d-block m-auto">
                  {loading === true ? <Spinner size="sm" /> : ""}
                  <span className="ms-1">ثبت پیامد</span>
              </Button>
            </Col>
          </Row>
        </Form>
      </CardBody>
    </Card>
    </>
  );
};

export default RankStorCoponent;
