import { renderWithRouter } from "../../test-utiles";
import App from "../../App";
import { screen } from "@testing-library/dom";
import user from "@testing-library/user-event";
import { act, cleanup } from "@testing-library/react";
import { afterEach } from "vitest";

describe("sign page ", () => {
  // afterEach(cleanup);
  it("render correctly", () => {});
  const route = "/sign";
  renderWithRouter(<App />, { route });
  expect(screen.getByRole("heading", { name: /healon/i })).toBeInTheDocument();
  expect(
    screen.getByRole("textbox", { name: /email or phone/i })
  ).toBeInTheDocument();
  describe("form validation email or phone", async () => {
    // afterEach(() => {
    //   cleanup();
    // });
    it("if we enter empty input that give us an error", async () => {
      const route = "/sign";
      renderWithRouter(<App />, { route });
      const baseInpt = screen.getByRole("textbox", { name: /email or phone/i });
      await user.type(baseInpt, "  ");
      await user.click(screen.getByRole("button", { name: "Sign in" }));
      expect(screen.getByText(/please fill the input's/i)).toBeInTheDocument();
    });
    it("if we enter unvalid input at login base that give us error", async () => {
      const route = "/sign";
      renderWithRouter(<App />, { route });
      const baseInpt = screen.getByRole("textbox", { name: /email or phone/i });
      await user.type(baseInpt, "099222");
      await user.click(screen.getByRole("button", { name: "Sign in" }));
      expect(
        screen.getByText(/please fill valid email address or phone number/i)
      ).toBeInTheDocument();

      await user.clear(baseInpt);
      await user.type(baseInpt, "jjj@");
      await user.click(screen.getByRole("button", { name: "Sign in" }));
      expect(
        screen.getByText(/please fill valid email address or phone number/i)
      ).toBeInTheDocument();
    });
    it("after input error changing value error goes away", async () => {
      const route = "/sign";
      renderWithRouter(<App />, { route });
      const baseInpt = screen.getByRole("textbox", { name: /email or phone/i });
      await user.type(baseInpt, "09123456");
      await user.click(screen.getByRole("button", { name: "Sign in" }));
      expect(
        screen.getByText(/please fill valid email address or phone number/i)
      ).toBeInTheDocument();
      await user.type(baseInpt, "091234562");
      expect(
        screen.queryByText(/please fill valid email address or phone number/i)
      ).toBeNull();
    });

    test("enter exist number as user", async () => {
      const route = "/sign";
      renderWithRouter(<App />, { route });
      const baseInpt = screen.getByRole("textbox", { name: /email or phone/i });
      // await user.type(baseInpt, "09123456789");
      await user.type(baseInpt, "09221112222");

      await user.click(screen.getByRole("button", { name: "Sign in" }));

      expect(
        screen.queryByRole("textbox", { name: /email or phone/i })
      ).toBeNull();
      expect(
        screen.getByText("Please enter your password")
      ).toBeInTheDocument();
    });
    test.skip("enter number that not exist as user", async () => {
      const route = "/sign";
      renderWithRouter(<App />, { route });
      const baseInpt = screen.getByRole("textbox", { name: /email or phone/i });
      await user.type(baseInpt, "09211112121");
      await user.click(screen.getByRole("button", { name: "Sign in" }));
      expect(
        screen.queryByRole("textbox", { name: /email or phone/i })
      ).toBeNull();
      expect(
        screen.getByRole("heading", { name: /adventure starts here/i })
      ).toBeInTheDocument();
    });
  });
});
