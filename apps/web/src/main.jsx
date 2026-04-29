import React from "react";
import ReactDOM from "react-dom/client";
import { createBrowserRouter, RouterProvider } from "react-router";
import "./styles.css";

function HomePage() {
  // The first screen introduces the product direction without extra complexity.
  return (
    <main className="page-shell">
      <section className="hero-card">
        <p className="eyebrow">RandevuMind</p>
        <h1>Randevular, odemeler ve musteri kayitlari tek panelde.</h1>
        <p className="description">
          Guzellik salonlari, klinikler ve randevu ile calisan tum isletmeler
          icin sade bir operasyon merkezi olusturuyoruz.
        </p>
      </section>
    </main>
  );
}

const router = createBrowserRouter([
  {
    path: "/",
    element: <HomePage />
  }
]);

ReactDOM.createRoot(document.getElementById("root")).render(
  <React.StrictMode>
    <RouterProvider router={router} />
  </React.StrictMode>
);
