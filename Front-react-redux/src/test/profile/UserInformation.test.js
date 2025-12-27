import { act, render, screen } from "@testing-library/react";
import { renderWithRouter } from "../../test-utiles";
import user from "@testing-library/user-event";
import App from "../../App";
import { store } from "../../redux/store";
import { assignUser, userSign } from "../../redux/sign";
import { loginUser } from "../../redux/log";
import { beforeAll, beforeEach } from "vitest";
import UserDetail from "../../views/profile/UserDetail";

describe("user profile information", () => {
  beforeAll(async () => {
    renderWithRouter(<App />);
    await act(() => {
      store.dispatch(assignUser("09221112222"));
      store.dispatch(userSign("09221112222"));
    });
    await act(() => {
      store.dispatch(loginUser("321"));
    });
  });
  beforeEach(async () => {
    const route = "/profile/user";
    await act(() => renderWithRouter(<App />, { route }));
  });

  // it("tst tst", () => {
  //   screen.debug(undefined, Infinity);
  // });

  it("render correctly", () => {
    expect(
      screen.getByRole("textbox", { name: /first name/i })
    ).toBeInTheDocument();
    expect(
      screen.getByRole("textbox", { name: /last name/i })
    ).toBeInTheDocument();
    expect(screen.getByRole("textbox", { name: /email/i })).toBeInTheDocument();
    expect(
      screen.getByRole("spinbutton", { name: /phone number/i })
    ).toBeInTheDocument();
    expect(
      screen.getByRole("combobox", { name: /gender/i })
    ).toBeInTheDocument();
    expect(screen.getByRole("option", { name: /^male/i })).toBeInTheDocument();
    expect(screen.getByLabelText(/birthday/i)).toBeInTheDocument();
  });

  it("submit with empty input", async () => {
    const applyBtn = screen.getByRole("button", { name: /apply/i });

    await user.click(applyBtn);

    expect(screen.queryByTestId("first_name")).toBeInTheDocument();
    expect(screen.queryByTestId("last_name")).toBeInTheDocument();
    expect(screen.queryByTestId("email")).toBeInTheDocument();
    expect(screen.queryByTestId("mobile")).toBeInTheDocument();
    expect(screen.queryByTestId("gender_enum")).toBeInTheDocument();
    expect(screen.queryByTestId("birthday")).toBeInTheDocument();
    // screen.debug(undefined, Infinity);
  });

  it("remove errors after reenter letter in inputs", async () => {
    const firstNameInp = screen.getByRole("textbox", { name: /first name/i });
    const lastNameInp = screen.getByRole("textbox", { name: /last name/i });
    const emailInp = screen.getByRole("textbox", { name: /email/i });
    const mobileInp = screen.getByRole("spinbutton", { name: /phone number/i });
    const genderSelect = screen.getByRole("combobox", { name: /gender/i });
    const birthdayDate = screen.getByLabelText(/birthday/i);

    const applyBtn = screen.getByRole("button", { name: /apply/i });

    await user.click(applyBtn);

    expect(screen.queryByTestId("first_name")).toBeInTheDocument();
    expect(screen.queryByTestId("last_name")).toBeInTheDocument();
    expect(screen.queryByTestId("email")).toBeInTheDocument();
    expect(screen.queryByTestId("mobile")).toBeInTheDocument();
    expect(screen.queryByTestId("gender_enum")).toBeInTheDocument();
    expect(screen.queryByTestId("birthday")).toBeInTheDocument();
    await user.type(firstNameInp, "htrrr");
    await user.type(lastNameInp, "iiop");
    await user.type(emailInp, "ewrt@rrt.com");
    await user.type(mobileInp, "09983212734");
    await user.selectOptions(genderSelect, "male");
    await user.type(birthdayDate, "2023-05-03");

    expect(screen.queryByTestId("first_name")).toHaveTextContent("");
    expect(screen.queryByTestId("first_name")).toHaveTextContent("");
    expect(screen.queryByTestId("last_name")).toHaveTextContent("");
    expect(screen.queryByTestId("email")).toHaveTextContent("");
    expect(screen.queryByTestId("mobile")).toHaveTextContent("");
    expect(screen.queryByTestId("gender_enum")).toHaveTextContent("");
    expect(screen.queryByTestId("birthday")).toHaveTextContent("");
    // screen.debug(undefined, Infinity);
  });
});
