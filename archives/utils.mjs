export const getTimestamp = date => ({
  unix: date.getTime(),
  utc: date.toUTCString()
})
