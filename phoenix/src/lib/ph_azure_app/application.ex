defmodule PhAzureApp.Application do
  # See https://hexdocs.pm/elixir/Application.html
  # for more information on OTP Applications
  @moduledoc false

  use Application

  @impl true
  def start(_type, _args) do
    children = [
      # Start the Telemetry supervisor
      PhAzureAppWeb.Telemetry,
      # Start the Ecto repository
      PhAzureApp.Repo,
      # Start the PubSub system
      {Phoenix.PubSub, name: PhAzureApp.PubSub},
      # Start Finch
      {Finch, name: PhAzureApp.Finch},
      # Start the Endpoint (http/https)
      PhAzureAppWeb.Endpoint
      # Start a worker by calling: PhAzureApp.Worker.start_link(arg)
      # {PhAzureApp.Worker, arg}
    ]

    # See https://hexdocs.pm/elixir/Supervisor.html
    # for other strategies and supported options
    opts = [strategy: :one_for_one, name: PhAzureApp.Supervisor]
    Supervisor.start_link(children, opts)
  end

  # Tell Phoenix to update the endpoint configuration
  # whenever the application is updated.
  @impl true
  def config_change(changed, _new, removed) do
    PhAzureAppWeb.Endpoint.config_change(changed, removed)
    :ok
  end
end
