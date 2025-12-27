import { act, screen } from "@testing-library/react";
import user from "@testing-library/user-event";
import App from "../../App";
import { renderWithRouter } from "../../test-utiles";
import { store } from "../../redux/store";
import { assignUser, userSign } from "../../redux/sign";

describe("register page", () => {
  beforeEach(async () => {
    await act(() => {
      // store.dispatch(logOut());
      store.dispatch(assignUser("09211118888"));
      store.dispatch(userSign("09211118888"));
    });
  });
  it("render correctly", () => {
    const route = "/register";
    renderWithRouter(<App />, { route });
    expect(
      screen.getByText(/enter the verification code to create a new account./i)
    ).toBeInTheDocument();
    expect(screen.getByRole("textbox", { name: /verification code/i }))
      .toBeInTheDocument;
    expect(screen.getByText("Resend Verification Code")).toBeInTheDocument;
    expect(screen.getByRole("button", { name: /submit/i })).toBeInTheDocument();
  });
  it("enter empty value to input give us error", async () => {
    const route = "/register";
    renderWithRouter(<App />, { route });

    const input = screen.getByRole("textbox", { name: /verification code/i });
    const submit = screen.getByRole("button", { name: /submit/i });
    await user.type(input, "   ");
    await user.click(submit);

    expect(screen.getByText(/please fill the input/i)).toBeInTheDocument();
  });
  it("clear error when refill input", async () => {
    const route = "/register";
    renderWithRouter(<App />, { route });

    const input = screen.getByRole("textbox", { name: /verification code/i });
    const submit = screen.getByRole("button", { name: /submit/i });
    await user.type(input, "   ");
    await user.click(submit);

    expect(screen.getByText(/please fill the input/i)).toBeInTheDocument();
    await user.clear(input);
    expect(screen.queryByText(/please fill the input/i)).toBeNull();
  });
  it("clear error when refill input", async () => {
    const route = "/register";
    renderWithRouter(<App />, { route });

    const input = screen.getByRole("textbox", { name: /verification code/i });
    const submit = screen.getByRole("button", { name: /submit/i });
    await user.type(input, "   ");
    await user.click(submit);

    expect(screen.getByText(/please fill the input/i)).toBeInTheDocument();
    await user.clear(input);
    expect(screen.queryByText(/please fill the input/i)).toBeNull();
  });
  it("fill with wrong otp and submit login", async () => {
    const route = "/register";
    renderWithRouter(<App />, { route });

    const input = screen.getByRole("textbox", { name: /verification code/i });
    const submit = screen.getByRole("button", { name: /submit/i });
    await user.clear(input);
    await user.type(input, "99966");
    await user.click(submit);
    expect(
      screen.queryByText(/username or code is invalid/i)
    ).toBeInTheDocument();
  });
  it.skip("fill with correct otp and submit login", async () => {
    const route = "/register";
    renderWithRouter(<App />, { route });

    const input = screen.getByRole("textbox", { name: /verification code/i });
    const submit = screen.getByRole("button", { name: /submit/i });
    await user.clear(input);
    await user.type(input, "66543");
    await user.click(submit);
    expect(
      screen.queryByRole("heading", { name: /health/i })
    ).toBeInTheDocument();
  });
});
