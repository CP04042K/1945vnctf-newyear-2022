FROM mcr.microsoft.com/dotnet/aspnet:3.1
COPY out /app
RUN useradd -ms /bin/bash app
RUN chown -R app:app /app/*
RUN echo "1945VN{U_Pwned_th15_ch4ll|=.=|Respect_t0_u}" > /app/flag.txt && chown root:root /app/flag.txt && chmod 444 /app/flag.txt
USER app
WORKDIR /app
ENV ASPNETCORE_URLS=http://0.0.0.0:80
ENTRYPOINT ["dotnet", "BKSEC.dll"]