FROM node:18-alpine

WORKDIR /app

COPY app/package*.json ./

RUN npm install

COPY --link app/src ./src
COPY --link app/public ./public
# COPY --link app/jsconfig.json .
# COPY --link app/next.config.js .
# COPY --link app/postcss.config.js .
# COPY --link app/tailwind.config.js .

CMD ["npm", "start"]
