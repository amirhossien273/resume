import React, { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { Controller, useForm } from "react-hook-form";

import {
  Modal,
  ModalBody,
  ModalFooter,
  Button,
  Col,
  Form,
  Card,
  Row,
  CardBody,
  CardTitle,
} from "reactstrap";
import { addSelectAsset, featchSelectAssets } from "../../redux/asset/selectAsset";

const ShowAssetOptionModelComponent = ({ isOpen, toggleModal, assetOption }) => {

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
        <ModalBody style={{  textAlign: "right"}}>
        {assetOption.map( (item, index) => {
              return(
                <li className="p-2">{item.name}</li>
              )
            })}
        </ModalBody>
        <ModalFooter>
        </ModalFooter>
    </Modal>
  );
};

export default ShowAssetOptionModelComponent;
