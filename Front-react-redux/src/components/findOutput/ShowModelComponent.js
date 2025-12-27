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
  Table,
} from "reactstrap";
import { addSelectAsset, featchSelectAssets } from "../../redux/asset/selectAsset";

const ShowOptionModelComponent = ({ isOpen, toggleModal, treatOption }) => {

  return (
    <Modal isOpen={isOpen} toggle={toggleModal} className="modal-lg">
      <div className="modal-header">
        <h5 className="modal-title"></h5>
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
          <Table striped bordered hover>
            <thead>
              <tr>
                <th>#</th>
                <th>معیار</th>
                <th>امتیاز</th>
              </tr>
              </thead>
              <tbody>
                {treatOption.map( (item, index) => {
                    return(
                      <tr>
                        <td>{item.name}</td>
                        <td>{item.description}</td>
                        <td>{item.scor}</td>
                      </tr>
                      // <li className="p-2">{item.name}{item.description}</li>
                    )
                  })}
              </tbody>
          </Table>
        </ModalBody>
        <ModalFooter>
        </ModalFooter>
    </Modal>
  );
};

export default ShowOptionModelComponent;
