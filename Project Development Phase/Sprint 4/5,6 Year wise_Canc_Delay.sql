WITH
  cancellation_data AS (
  SELECT
    EXTRACT(year
    FROM
      FL_DATE) AS year,
    COUNT(*) AS cancellation_cnt
  FROM
    `airline-delay-canc.airlines_data.delay_canc_data`
  WHERE
    CANCELLED = 1
  GROUP BY
    year
  ORDER BY
    year ),
  delayed_data AS (
  SELECT
    EXTRACT(year
    FROM
      FL_DATE) AS year,
    COUNT(*) AS delay_cnt
  FROM
    `airline-delay-canc.airlines_data.delay_canc_data`
  WHERE
    (CARRIER_DELAY IS NOT NULL
      AND CARRIER_DELAY > 0
      OR ARR_DELAY IS NOT NULL
      AND ARR_DELAY > 0)
  GROUP BY
    year
  ORDER BY
    year )
SELECT
  c.year,
  c.cancellation_cnt,
  d.delay_cnt
FROM
  cancellation_data c,
  delayed_data d
WHERE
  c.year = d.year
ORDER BY
  c.year