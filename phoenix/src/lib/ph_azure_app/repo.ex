defmodule PhAzureApp.Repo do
  use Ecto.Repo,
    otp_app: :ph_azure_app,
    adapter: Ecto.Adapters.Postgres
end
