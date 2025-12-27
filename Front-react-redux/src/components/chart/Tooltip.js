import { Table } from "reactstrap";
import styles from "./tooltip.module.css"

export const Tooltip = ({ interactionData, width, height }) => {
  // console.log("interactionData", interactionData);
  if (!interactionData) {
    return null
  }

  return (
    // Wrapper div: a rect on top of the viz area
    <div
      style={{
        width,
        height,
        position: "absolute",
        top: 0,
        left: 0,
        pointerEvents: "none"
      }}
    >
      {/* The actual box with white background */}
      <div
        // class="col-md-12"
        className={styles.tooltip}
        style={{
          position: "absolute",
          width: '500px',
          height: '100px',
          left: '0%',
          top: '50%'
        }}
      >
        <Table>
        <thead>
            <tr>
              <th>نوع تهدید</th>
              <th>قرارگاهی</th>
              <th> ریسک پذیریی</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td>{interactionData.yLabel}</td>
                <td>{interactionData.xLabel}</td>
                <td>{interactionData.value}</td>
              </tr>
          </tbody>    
        </Table>
      </div>
    </div>
  )
}
