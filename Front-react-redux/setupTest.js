import { expect, beforeEach, beforeAll, afterEach, afterAll } from "vitest";
import "@testing-library/jest-dom";

import matchers from "@testing-library/jest-dom/dist/matchers";
import { cleanup } from "@testing-library/react";
import { server } from "./src/mocks/server";

expect.extend(matchers);

beforeEach(() => {
  cleanup();
});

beforeAll(() => server.listen());

afterEach(() => {
  //   cleanup();
  server.resetHandlers();
});

afterAll(() => server.close());
