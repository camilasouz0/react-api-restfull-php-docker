FROM node:18-alpine

WORKDIR /app

COPY app/package*.json ./

RUN npm install

COPY --link app/src ./src
COPY --link app/public ./public

CMD ["npm", "start"]
