import React, { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import {
  Modal,
  ModalBody,
  ModalFooter,
  Button,
  Table
} from "reactstrap";
import { addSelectAsset, addSelectStoreAsset, addSelectAssetInput } from "../../redux/asset/selectAsset";

const SelectAssetModelComponent = ({ isOpen, toggleModal }) => {

  const [inputValues, setInputValues] = useState({});
  const [selectValues, setSelectValues] = useState({});
  const [checkedBoxes, setCheckedBoxes] = useState({});

  const { SelectAsset } = useSelector((s) => s);
  const dispatch = useDispatch();

  const handelcheckbox = (value, name) => {
    dispatch(addSelectAsset({ [name]: { optin_id: value } }));
  };

  const handelcheckboxInput = (value, itemId) => {
    console.log(selectValues);
    console.log(inputValues[itemId] , selectValues[itemId]);
    if (!inputValues[itemId] || !selectValues[itemId]) {
     alert("موضوع را وارد کنید");
      return;
    }

    dispatch(addSelectAssetInput({ [itemId]: { name: inputValues[itemId], score: selectValues[itemId] } }));

    setCheckedBoxes((prev) => ({ ...prev, [itemId]: true }));
  }

  const handleInputChange = (e, itemId) => {
    setInputValues((prev) => ({ ...prev, [itemId]: e.target.value }));
  };



  const handelSelectBox = (value, name) => {
    setSelectValues((prev) => ({ ...prev, [name]: value }));

      dispatch(addSelectStoreAsset({[name]: {scor: value}}));
  }



  const dataOption = [
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

  const showData = (data, key = 1) => {
    return data.map((item) => {
      if (key === 1) {
        return (
          <div key={item.id}>
            <div>{item.name}</div>
            <div>{showData(item?.children, 2)}</div>
          </div>
        );
      }

      if (key === 2) {
        return (
          <Table striped bordered hover key={item.id}>
            <thead>
              <tr>
                <th>{item.name}</th>
                <th>امتیاز</th>
              </tr>
            </thead>
            <tbody>
              {item.children.map((child) => (
                <tr key={child.id}>
                  <td>
                    <input
                      name={`item${item.id}[]`}
                      className="form-check-input"
                      type="radio"
                      value={child.id}
                      
                      onChange={(e) => handelcheckbox(e.target.value, item.id)}
                    />
                    <label className="ms-25 form-check-label fw-bolder text-primary text-capitalize font-medium-1">
                      {child.name}
                    </label>
                  </td>
                  <td>
                    {/* {child.scor} */}
                    <select onChange={(e) => handelSelectBox(e.target.value, child.id)}>
                        <option value={null}>...</option>
                        {dataOption.map((item, index) => {
                          return (
                            <option key={index} value={item.value}>{item.label}</option>
                          )
                        })}     
                    </select>
                  </td>
                </tr>
              ))}
                <tr  className="border">
                  <td>
                      <input
                        name={`item${item.id}[]`}
                        className="form-check-input"
                        type="radio"
                        value={`add${item.id}`}
                        checked={checkedBoxes[item.id] || false}
                        onChange={(e) => handelcheckboxInput(e.target.value, item.id)}
                      />
                      <label style={{  width: '100%'}} className="ms-25 form-check-label fw-bolder text-primary text-capitalize font-medium-1">
                        <input style={{  width: '100%'}} 
                        className={`form-control`} 
                        placeholder="" 
                         id="asset" 
                         type="text"  
                         onChange={(e) => handleInputChange(e, item.id)}
                         />
                      </label>
                    </td>
                    <td>
                    <select onChange={(e) => handelSelectBox(e.target.value, item.id)}>
                        <option value={null}>...</option>
                        {dataOption.map((item, index) => {
                          return (
                            <option key={index} value={item.value}>{item.label}</option>
                          )
                        })}     
                    </select>
                    </td>
                </tr>
            </tbody>
          </Table>
        );
      }
      return null;
    });
  };

  return (
    <Modal isOpen={isOpen} toggle={toggleModal} className="modal-lg">
      <div className="modal-header">
        <h5 className="modal-title">معیار ها و شاخص های کیفی</h5>
        <Button
          type="button"
          className="btn close font-large-2 p-0"
          data-dismiss="modal"
          aria-label="Close"
          onClick={toggleModal}
        >
          <span aria-hidden="true">&times;</span>
        </Button>
      </div>
      <ModalBody style={{ textAlign: "right" }}>
        {showData(SelectAsset.data)}
      </ModalBody>
      <ModalFooter></ModalFooter>
    </Modal>
  );
};

export default SelectAssetModelComponent;